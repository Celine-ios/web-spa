$(document).ready(function() {
    Dropzone.options.myDropzone = {
        autoProcessQueue: true,
        uploadMultiple: true,
        maxFiles: 4,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp, .pdf',

        init: function() {
            var submitBtn = document.querySelector("#submit");
            myDropzone = this;

            this.on("complete", function(file) {
                myDropzone.removeFile(file);
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    location.reload();
                }
            });

            this.on("success", function() {
                myDropzone.processQueue.bind(myDropzone);
            });
        }
    };
});
