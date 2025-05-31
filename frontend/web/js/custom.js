$(document).ready(function(){

    // Slide Left (hide)
    $.fn.slideLeft = function(duration = 400, callback) {
        return this.each(function() {
        $(this).animate({ width: 0 }, duration, function() {
            $(this).hide();
            if (typeof callback === "function") callback();
        });
        });
    };
  
    // Slide Right (show)
    $.fn.slideRight = function(duration = 400, callback) {
        return this.each(function() {
        const el = $(this);
        el.show(); // show element first to calculate full width
        const fullWidth = el.data('full-width');
    
        // fallback if width not saved before
        if (!fullWidth) {
            el.css({ width: 'auto', visibility: 'hidden' });
            el.data('full-width', el.width());
            el.css({ width: 0, visibility: 'visible' });
        }
    
        el.animate({ width: el.data('full-width') }, duration, function() {
            if (typeof callback === "function") callback();
        });
        });
    };


    $('.user_types .type_item').on('click',function(e){
        e.preventDefault();
        $('.user_types .type_item').removeClass('active');
        $(this).addClass('active');

        let target = $(this).attr('href');
        $('.login_forms .form_item').removeClass('active');
        $(target).addClass('active');
    })

})