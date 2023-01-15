</div>
</div>

<div class="toast-container position-fixed position-relative top-0 end-0 p-3">
    <div id="succesToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body" style="color:green;">
            ทำรายการสำเร็จ
        </div>
    </div>
</div>
<style>
.toast {
    animation: slideDown 0.5s ease-in-out;
}

@keyframes slideDown {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }

    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>
<script type="text/javascript">
// ถ้า url เป้น  http://localhost/index.html?ID=4
var strID = window.location.href;
// จะได้ strID  = http://localhost/index.html?ID=4
var arrID = strID.split("?");
// จะได้ arrID เป็น array มีค่า 
// arrID[0]="http://localhost/index.html";
// arrID[1]="ID=4";
var dataID = arrID[1].split("=");
// แบ่งอีกครั้งด้วย =  จะได้ 
// dataID[0]="ID";
// dataID[1]="4";
var message = dataID[1];

function resMes(essage) {
    if (message == 1) {
        const toastLiveExample = document.getElementById('succesToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    }
}
resMes()
</script>

<!-- Core theme JS-->
<script src="js/script.js"></script>


</body>

</html>