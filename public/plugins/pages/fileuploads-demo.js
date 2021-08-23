$(".dropify").dropify({
  messages: {
    default: "<small>Drag and drop a file here or click</small>",
    replace: "Drag and drop or click to replace",
    remove: "Remove",
    error: "Ooops, something wrong appended.",
  },
  error: {
    fileSize: "The file size is too big (1M max).",
  },
});
