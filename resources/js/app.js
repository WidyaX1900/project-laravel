$("#imageUploader button").on("click", function() {
    $("#photo").click();
});
$("#photo").on("change", function (event) {
    const file = event.target.files[0];    
    imageHandler(file);
});

if ($(".error-warning").length > 0) {
    setTimeout(() => {
        $(".error-warning").html("");
    }, 3000);
}

if ($("#flashAlert").length > 0) {
    setTimeout(() => {
        $("#flashAlert").remove()
    }, 3000);
}

let warningTimeout;
function imageHandler(file) {    
    const reader = new FileReader();
    const $preview = $("#imageUploader img");
    if(file !== undefined) {
        const fileName = file.name;
        
        // Check whether the uploaded file is an image
        const validExt = ["jpg", "png", "jpeg"];
        let fileExt = fileName.split(".");
        fileExt = fileExt[fileExt.length - 1];
        
        if (validExt.includes(fileExt)) {
            // Check whether image size is smaller than 2MB
            const fileSize = file.size;
            if (fileSize <= 2000000) {
                reader.addEventListener("load", () => {
                    $preview.attr("src", reader.result);
                });
                reader.readAsDataURL(file);
            } else {
                $("#photo").val("");
                $("#imageUploader .error-warning").html(`
                    This file is too large. Maximum upload is 2MB!
                `);
            }
        } else {
            $("#photo").val("");
            $("#imageUploader .error-warning").html("This file is not an image!");
        }

        if ($("#imageUploader .error-warning").html() !== "") {
            clearTimeout(warningTimeout);
            warningTimeout = setTimeout(() => {
                $("#imageUploader .error-warning").html("");
            }, 3000);
        }
    }        
}

$(".delete-button").on("click", function(event) {
    const student_id = $(this).data("student_id");
    $("#deleteForm").attr("action", "/student/destroy/" + student_id);       
    $("#deleteStudentModal").modal("show");
        
});

