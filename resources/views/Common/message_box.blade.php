<style>
    .msg-box{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
        background-color: rgba(0, 0, 0, 0.4);
        z-index:9999;
    }
    .msg-box-content{
        background-color:#ffffff;
        width:380px;
        height:200px;
        position: relative;
        margin: 200px auto;
        border-radius: 2px;
        box-shadow: 0 1px 3px rgba(0,0,0,.3);
        box-sizing: border-box;
    }
    .msg-box-content .error-txt{
        display: inline-block;
        margin-left:20px;
        margin-top:50px;
    }
    .msg-box-content .btn-confirm{
        display: inline-block;
        width:  90px;
        height: 36px;
        line-height: 36px;
        background: #59b0ff;;
        border-radius: 4px;
        color: #ffffff;
        position: absolute;
        bottom: 20px;
        right: 20px;
        text-align: center;
        cursor: pointer;
    }
    .msg-box-content .btn-confirm:hover{
        background-color: #4DAAFF;
    }
    .msg-box-content .btn-confirm:active{
        background-color: #1A90FF;
    }
</style>

<div class="msg-box">
    <div class="msg-box-content">
        <span class="error-txt"></span>
        <span class="btn-confirm" onclick="closeBox()">确定</span>
    </div>
</div>

<script>
    function closeBox() {
        $('.msg-box').css('display', 'none');
    }
</script>