//=========== for bangla number

var allowedKeys = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
  "ARROWRIGHT", "ARROWLEFT", "TAB", "BACKSPACE", "DELETE", "HOME", "END", "০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯","."
];

if (document.readyState === "complete") onLoad();
else addEventListener("load", onLoad);

function onLoad() {
  document.querySelectorAll("input.numeric").forEach(function(input) {
    input.addEventListener("keydown", onInputKeyDown);
    input.addEventListener("paste", onInputPaste);
  });
}

function onInputKeyDown(event) {
  if (!allowedKeys.includes(event.key.toUpperCase()) && !event.ctrlKey) {
    event.preventDefault();
  }
}

function onInputPaste(event) {
  var clipboardData = event.clipboardData || window.clipboardData;
  if (/^[0-9০-৯]+$/g.test(clipboardData.getData("Text"))) return;
  event.stopPropagation();
  event.preventDefault();
}