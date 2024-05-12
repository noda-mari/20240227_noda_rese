const textArea = document.getElementById("review__comment");
const text_length = document.getElementById("text-length");

if (textArea) {
    textArea.addEventListener("keyup", function () {
        let count = textArea.value.length;
        if (count <= 400) {
            if (textArea.classList.contains("err")) {
                textArea.classList.remove("err");
            }
            text_length.innerHTML = count + "/400";
        } else {
            textArea.classList.add("err");
            text_length.innerHTML =
                count + '/400<span>"文字数オーバーです"</span>';
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    // ドロップエリアの要素を取得
    const dropArea = document.getElementById("dropArea");
    const selectedFile = document.getElementById("selected__file");

    // ファイルドラッグオーバー時の処理を定義
    dropArea.addEventListener("dragover", function (event) {
        event.preventDefault();
        dropArea.style.background = "#c0c0c0";
    });

    // ファイルドラッグアウト時の処理を定義
    dropArea.addEventListener("dragleave", function (event) {
        event.preventDefault();
        dropArea.style.background = "#ffffff";
    });

    // ドロップ時の処理を定義
    dropArea.addEventListener("drop", function (event) {
        event.preventDefault();
        dropArea.style.background = "#ffffff";

        const fileInput = document.getElementById("fileInput");
        const files = event.dataTransfer.files;
        // ドロップされたファイルをinput要素に設定
        fileInput.files = files;
        var fileName = fileInput.files[0].name;
        selectedFile.innerText = "<" + fileName + ">";
    });

    // input要素のファイル選択ダイアログを表示するリンクのクリック時の処理を定義
    document
        .getElementById("browseLink")
        .addEventListener("click", function (event) {
            event.preventDefault();
            document.getElementById("fileInput").click();
        });

    fileInput.addEventListener("change", () => {
        var fileName = fileInput.files[0].name;
        selectedFile.innerText = "<" + fileName + ">";
    });
});
