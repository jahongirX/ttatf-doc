pipeline {
    agent any
    stages {
        stage('tisu.uz update') {
            steps {
                sh 'ansible-playbook /var/lib/jenkins/ansible/tisu_uz.yml -l hosting-9_25'
            }
        }
    }
}
