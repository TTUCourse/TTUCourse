<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>信箱驗證</h2>

        <div>
            感謝您在大同課評網建立帳號<br>
            我們將進行最後一個驗證步驟：<br>
            請點擊底下連結進行 EMail 的驗證。<br>
            {{ URL::to('/verify/' . $confirmation_code) }}.<br/>
            <br>
            Thanks for creating an account.<br>
            Please follow the link below to verify your email address<br>
            {{ URL::to('/verify/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>
