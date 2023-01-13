<script>

    //To preview the image on post before publishing
    image.onchange = evt => {
      const [file] = image.files
      if (file) {
        prview.style.visibility = 'visible';

        prview.src = URL.createObjectURL(file)
      }
    }
</script>
