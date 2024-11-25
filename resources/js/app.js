$("#imageUploader button").on("click", function() {
    $("#photo").click();
});
$("#photo").on("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    const $preview = $("#imageUploader img");
    reader.addEventListener("load", function() {
        $preview.attr("src", reader.result)
    });
    
    if(file) reader.readAsDataURL(file)   
});

