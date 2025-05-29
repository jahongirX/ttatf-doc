<?php 

namespace common\components;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use Yii;

class GoogleSheetsService
{
    private $service;
    private $spreadsheetId;

    public function __construct($spreadsheetId, $credentialsPath)
    {
        $client = new Client();
        $client->setAuthConfig($credentialsPath);
        $client->addScope(Sheets::SPREADSHEETS);
        $this->service = new Sheets($client);
        $this->spreadsheetId = $spreadsheetId;
    }

    public function createSheetIfNotExists($sheetTitle)
    {
        try {
            $spreadsheet = $this->service->spreadsheets->get($this->spreadsheetId);
            $sheets = $spreadsheet->getSheets();
            
            foreach ($sheets as $sheet) {
                if ($sheet->getProperties()->getTitle() == $sheetTitle) {
                    return true;
                }
            }
            
            $batchUpdateRequest = new \Google\Service\Sheets\BatchUpdateSpreadsheetRequest([
                'requests' => [
                    'addSheet' => [
                        'properties' => [
                            'title' => $sheetTitle
                        ]
                    ]
                ]
            ]);
            
            $this->service->spreadsheets->batchUpdate($this->spreadsheetId, $batchUpdateRequest);
            return true;
            
        } catch (\Exception $e) {
            Yii::error("Google Sheets error: " . $e->getMessage());
            return false;
        }
    }

    public function appendData($sheetTitle, $data, $isHeader = false)
    {
        try {
            // First ensure sheet exists
            $this->createSheetIfNotExists($sheetTitle);
            
            // Get all data to find next empty row
            $response = $this->service->spreadsheets_values->get(
                $this->spreadsheetId,
                $sheetTitle . '!A:Z'
            );
            
            $values = $response->getValues();
            $nextRow = empty($values) ? 1 : count($values) + 1;
            
            // For debugging
            Yii::info("Attempting to append to sheet '$sheetTitle' at row $nextRow");
            Yii::info("Data to append: " . print_r($data, true));
            
            $range = $sheetTitle . '!A' . $nextRow;
            
            $valueRange = new ValueRange();
            $valueRange->setValues([$data]);
            
            $params = [
                'valueInputOption' => 'RAW',
                'insertDataOption' => 'INSERT_ROWS'
            ];
            
            $result = $this->service->spreadsheets_values->append(
                $this->spreadsheetId,
                $range,
                $valueRange,
                $params
            );
            
            // Debug the API response
            Yii::info("Google Sheets API response: " . print_r($result, true));
            
            return true;
        } catch (\Exception $e) {
            Yii::error("Google Sheets append error: " . $e->getMessage());
            return false;
        }
    }

    public function isSheetEmpty($sheetTitle)
    {
        try {
            $response = $this->service->spreadsheets_values->get(
                $this->spreadsheetId,
                $sheetTitle . '!A1:Z1000'
            );
            
            $values = $response->getValues();
            return empty($values);
        } catch (\Exception $e) {
            Yii::error("Error checking if sheet is empty: " . $e->getMessage());
            return true; // Assume empty if there's an error
        }
    }

    public function applySheetStyle($sheetTitle)
    {
        try {
            // First get the sheet ID
            $spreadsheet = $this->service->spreadsheets->get($this->spreadsheetId);
            $sheetId = null;
            
            foreach ($spreadsheet->getSheets() as $sheet) {
                if ($sheet->getProperties()->getTitle() == $sheetTitle) {
                    $sheetId = $sheet->getProperties()->getSheetId();
                    break;
                }
            }
            
            if (!$sheetId) {
                Yii::error("Sheet not found for styling: $sheetTitle");
                return false;
            }
            
            // Prepare all style requests
            $requests = [
                // Set header row style
                $this->createHeaderStyleRequest($sheetId),
                
                // Set column widths
                $this->createColumnWidthRequest($sheetId),
                
                // Set borders for all cells
                $this->createBorderRequest($sheetId),
                
                // Set font size for all cells
                $this->createFontSizeRequest($sheetId)
            ];
            
            // Filter out null requests
            $requests = array_filter($requests);
            
            if (!empty($requests)) {
                $batchUpdateRequest = new \Google\Service\Sheets\BatchUpdateSpreadsheetRequest([
                    'requests' => $requests
                ]);
                
                $this->service->spreadsheets->batchUpdate($this->spreadsheetId, $batchUpdateRequest);
            }
            
            return true;
        } catch (\Exception $e) {
            Yii::error("Error applying sheet style: " . $e->getMessage());
            return false;
        }
    }

    private function createHeaderStyleRequest($sheetId)
    {
        return [
            'repeatCell' => [
                'range' => [
                    'sheetId' => $sheetId,
                    'startRowIndex' => 0,
                    'endRowIndex' => 1,
                    'startColumnIndex' => 0,
                    'endColumnIndex' => 8 
                ],
                'cell' => [
                    'userEnteredFormat' => [
                        'backgroundColor' => [
                            'red' => 0.8,
                            'green' => 0.8,
                            'blue' => 0.8
                        ],
                        'horizontalAlignment' => 'CENTER',
                        'textFormat' => [
                            'fontSize' => 14,
                            'bold' => true
                        ]
                    ]
                ],
                'fields' => 'userEnteredFormat(backgroundColor,textFormat,horizontalAlignment)'
            ]
        ];
    }

    private function createColumnWidthRequest($sheetId)
    {
        return [
            'updateDimensionProperties' => [
                'range' => [
                    'sheetId' => $sheetId,
                    'dimension' => 'COLUMNS',
                    'startIndex' => 0,
                    'endIndex' => 8 // Number of columns
                ],
                'properties' => [
                    'pixelSize' => 200 // Width in pixels
                ],
                'fields' => 'pixelSize'
            ]
        ];
    }

    private function createBorderRequest($sheetId)
    {
        return [
            'updateBorders' => [
                'range' => [
                    'sheetId' => $sheetId,
                    'startRowIndex' => 0,
                    'startColumnIndex' => 0,
                    'endColumnIndex' => 8 
                ],
                'top' => ['style' => 'SOLID', 'width' => 1],
                'bottom' => ['style' => 'SOLID', 'width' => 1],
                'left' => ['style' => 'SOLID', 'width' => 1],
                'right' => ['style' => 'SOLID', 'width' => 1],
                'innerHorizontal' => ['style' => 'SOLID', 'width' => 1],
                'innerVertical' => ['style' => 'SOLID', 'width' => 1]
            ]
        ];
    }

    private function createFontSizeRequest($sheetId)
    {
        return [
            'repeatCell' => [
                'range' => [
                    'sheetId' => $sheetId,
                    'startRowIndex' => 1 // Apply to all rows except header
                ],
                'cell' => [
                    'userEnteredFormat' => [
                        'textFormat' => [
                            'fontSize' => 12
                        ]
                    ]
                ],
                'fields' => 'userEnteredFormat.textFormat.fontSize'
            ]
        ];
    }
}