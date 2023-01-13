<script>
    //To generate the slug based on title
    $(function() {
        document.getElementById('title').addEventListener('blur', function(e){
            let url = document.getElementById('slug');
            if(url.value){
                return;
            }
            url.value = this.value
                .toString()
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\u0621-\u064A0-9-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '').replace(/-+$/, '');
        });
    });   

    //To preview the image on post before publishing
    image.onchange = evt => {
      const [file] = image.files
      if (file) {
        prview.style.visibility = 'visible';

        prview.src = URL.createObjectURL(file)
      }
    }
    
        //add date to post
    (function(){
        $('#published_at').datetimepicker({
            format: 'YYYY-MM-DD',
            sideBySide: true,
            date: '{{ $model-> published_at}}'
        });
    })();
</script>

