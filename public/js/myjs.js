
$('#category').on('change', function() {
        var url = this.value // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
  });