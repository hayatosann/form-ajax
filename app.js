$(function(){
  $('#form-ajax').on('submit', function(e){
      e.preventDefault();

      content = $('#content').val();
      console.log(content);

      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {"content": content},
        dataType: "json"
      }).done(function(data){
        console.log(data);
        let html = `
        <div>
          <p>${data.content}</p>
        </div>
        `;
        $("#container").append(html);
        console.log(data);
      }).fail(function(error){
        console.log('失敗');
      });
   });
});