<script>
  $('#add-categories').click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var n = $('input[name="select-category[]"]:checked').length;
  var array = $('input[name="select-category[]"]:checked');
  var ids = [];
  for(i=0;i<n;i++){
    ids[i] =  array.eq(i).val();
  }
  if(ids.length == 0){
	return false;
  }
  $.ajax({
	type:"get",
	data: {menuid:menuid,ids:ids},
	url: "{{url('add-categories-to-menu')}}",		
	success:function(res){				
      location.reload();
	}
  })
})
$('#add-posts').click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var n = $('input[name="select-post[]"]:checked').length;
  var array = $('input[name="select-post[]"]:checked');
  var ids = [];
  for(i=0;i<n;i++){
	ids[i] =  array.eq(i).val();
  }
  if(ids.length == 0){
	return false;
  }
  $.ajax({
	type:"get",
	data: {menuid:menuid,ids:ids},
	url: "{{url('add-post-to-menu')}}",		
	success:function(res){
  	  location.reload();
	}
  })
})
   $("#add-custom-link").click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var url = $('#url').val();
  var link = $('#linktext').val();
  if(url.length > 0 && link.length > 0){
	$.ajax({
	  type:"get",
	  data: {menuid:menuid,url:url,link:link},
	  url: "{{url('add-custom-link')}}",		
	  success:function(res){
	    location.reload();
	  }
	})
  }
});
var group = $("#menuitems").sortable({
  group: 'serialization',
  onDrop: function ($item, container, _super) {
    var data = group.sortable("serialize").get();	    
    var jsonString = JSON.stringify(data, null, '');
    $('#serialize_output').text(jsonString);
  	  _super($item, container);
  }
});
$('#saveMenu').click(function(){
  var menuid = <?=$selectedMenu->id?>;
  var location = $('input[name="location"]:checked').val();
  var newContent = $("#serialize_output").text();
  var data = JSON.parse($("#serialize_output").text());	
  $.ajax({
  type:"get",
	data: {menuid:menuid,data:data,location:location},
	url: "{{url('save-menu')}}",			
	success:function(res){
	  window.location.reload();
	}
  })	
})
</script>