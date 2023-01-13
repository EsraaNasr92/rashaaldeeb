<!-- Preview image script -->
<script>
image.onchange = evt => {
  const [file] = image.files
  if (file) {
    prview.style.visibility = 'visible';

    prview.src = URL.createObjectURL(file)
  }
}
</script>
