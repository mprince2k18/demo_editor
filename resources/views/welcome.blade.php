
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Summernote.js Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css'>
<style>
    @font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  font-stretch: normal;
  src: url(https://fonts.gstatic.com/s/opensans/v28/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsiH0B4gaVc.ttf) format('truetype');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-stretch: normal;
  src: url(https://fonts.gstatic.com/s/opensans/v28/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsjZ0B4gaVc.ttf) format('truetype');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-stretch: normal;
  src: url(https://fonts.gstatic.com/s/opensans/v28/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsgH1x4gaVc.ttf) format('truetype');
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  font-stretch: normal;
  src: url(https://fonts.gstatic.com/s/opensans/v28/memSYaGs126MiZpBA-UvWbX2vVnXBbObj2OVZyOOSr4dVJWUgsg-1x4gaVc.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmSU5fBBc9.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOmCnqEu92Fr1Mu4mxP.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmEU9fBBc9.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 700;
  src: url(https://fonts.gstatic.com/s/roboto/v29/KFOlCnqEu92Fr1MmWUlfBBc9.ttf) format('truetype');
}

</style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid">
 <div class="row">
  <div class="col-xs-12">
   <textarea name="" id="ta-1" cols="30" rows="30"></textarea>
  </div>
 </div>
 <div class="row">
  <div class="col-xs-12 text-right">
   <button class="btn btn-sm btn-primary" onclick="GetContent()">Get Content</button>
   <button class="btn btn-sm btn-primary" onclick="GetText()">Get Text</button>
   <button class="btn btn-sm btn-success" id="btn-set-content">Set Content</button>
   <button class="btn btn-sm btn-danger" id="btn-reset">Reset</button>
  </div>
 </div>
 <hr>
 <div class="row">
     <code>
         <p id="content"></p>
     </code>

     <code>
         <p id="text-content"></p>
     </code>
 </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js'></script>
<script>
	var content =
		"<p>loremdasdhjkas djhasdjkhsad djasl;djlaksdiowue dklsajdklsaj</p>";

	var $sumNote = $("#ta-1")
		.summernote({
            airMode: false,
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },
			callbacks: {
                onInit: function() {
                    console.log('Summernote is launched');
                },
				onPaste: function(e,x,d) {
					$sumNote.code(($($sumNote.code()).find("font").remove()));
				},
                onKeyup: function(e) {
                    setTimeout(function(){
                        GetContent();
                        GetText();
                    },100);
                }
			},

			dialogsInBody: true,
			dialogsFade: true,
			disableDragAndDrop: true,
			height: "150px",
			tableClassName: function() {
				alert("tbl");
				$(this)
					.addClass("table table-bordered")

					.attr("cellpadding", 0)
					.attr("cellspacing", 0)
					.attr("border", 1)
					.css("borderCollapse", "collapse")
					.css("table-layout", "fixed")
					.css("width", "100%");

				$(this)
					.find("td")
					.css("borderColor", "#ccc")
					.css("padding", "4px");
			}
		})
		.data("summernote");

	//get
    function GetContent()
    {
        var y =$($sumNote.code());
        var x = y.find("font").remove();		
        $("#content").text($("#ta-1").val());
    }

	function GetText() {
		$("#text-content").html($($sumNote.code()).text());
	};

	//set
	$("#btn-set-content").on("click", function() {
		$sumNote.code(content);
	}); //reset
	$("#btn-reset").on("click", function() {
		$sumNote.reset();
		$("#content").empty();
	});

    $('.note-btn').click(function (){
        setTimeout(function(){
            GetContent();
            GetText();
        },100);
    });

</script>

</body>
</html>
