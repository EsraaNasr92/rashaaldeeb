<script>
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
</script>