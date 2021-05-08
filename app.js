// インデントとか修正
$(function () {
  $("#form-ajax").on("submit", function (e) {
    e.preventDefault();

    // constつけたほうがよい
    const content = $("#content").val();
    console.log(content);

    $.ajax({
      type: "POST",
      url: "ajax.php",
      data: { content: content },
      dataType: "json",
    })
      .done(function (data) {
        console.log(data);
        // 関数にまとめちゃう
        renderHtml(data)
        console.log(data);
      })
      .fail(function (error) {
        console.log("失敗");
      });
  });

  function renderHtml(data) {
    // 値変えないならconstがいいかな
    const html = `
    <div>
      <p>${data.content}</p>
    </div>
    `;
    $("#container").append(html);
  }
});
