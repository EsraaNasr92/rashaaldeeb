<script>

      //To generate the slug based on title
      $(function() {
        document.getElementById('title').addEventListener('blur', function(e){
            let url = document.getElementById('slug');
            if(url.value){
                return;
            }
            url.value = this.value
                .toLowerCase()
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/^-+|-+$/g, '')
                .replace(/'/g, "\\'");
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
</script>
