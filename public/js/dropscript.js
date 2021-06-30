Dropzone.prototype.defaultOptions.dictDefaultMessage =
    "Arrastre sus archivos aquí";
Dropzone.options.dropZoneJS = {
    init: function () {
        var th = this;
        this.on("queuecomplete", function () {
            setTimeout(function () {
                th.removeAllFiles();
                location.reload();
            }, 1500);
        });
    },
    paramName: "file",
    maxFilesize: 1,
    acceptedFiles: "image/*",
};
