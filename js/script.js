  //名前欄のバリデーション
$(function () {
  $("input#m_name").focus(function(){
  	 $(this).css("background","#b3eaef");
  })

  $("input#m_name").on("blur", function () {
  	$(this).css("background","#fff");
  	$("p").remove();
    let error;
    let value = $(this).val();
    if (value == "" || !value.match(/[^\s\t]/)) {
      error = true;
    }

    if (error) {
      //エラー時の処理
      $('.append').append('<p>名前の入力をお願いいたします</p>');
    }
  });
});

  //メッセージ欄のバリデーション
$(function () {
  $("textarea#m_message").focus(function(){
  	 $(this).css("background","#b3eaef");
  })

  $("textarea#m_message").on("blur", function () {
  	$(this).css("background","#fff");
  	$("p").remove();
    let error;
    let value = $(this).val();
    if (value == "" || !value.match(/[^\s\t]/)　|| $(this).val().length >= 150) {
      error = true;
    }

    if (error) {
      //エラー時の処理
      $('.append').append('<p>150文字以内でメッセージの入力をお願いいたします</p>');
    }
  });
});

// 投稿テキスト欄の表示
$(function() {
	$('.samplemodal-open').click(function(){
	 $('#sampleModal').fadeIn();
	 $('html').addClass('modalset');
	});
	$('.samplemodal .samplemodal-bg,.samplemodal .samplemodal-close').click(function(){
	 $('#sampleModal').fadeOut();
	 $('html').removeClass('modalset');
	});
   });	
