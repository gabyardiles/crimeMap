$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });


    // validate Date
    
    function isValidDate(str) {
        
        var regex = /(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})\s*(\d{0,2}):?(\d{0,2}):?(\d{0,2})/,
        parts = regex.exec(str); 
        
        if (parts) {
          var date = new Date ( (+parts[3]), (+parts[1])-1, (+parts[2]), (+parts[4]), (+parts[5]), (+parts[6]) );
          if ( ( date.getDate() == parts[2] ) && ( date.getMonth() == parts[1]-1 ) && ( date.getFullYear() == parts[3] ) ) {
            return date;
          }
        } 
        
        return false;
      }
    
});