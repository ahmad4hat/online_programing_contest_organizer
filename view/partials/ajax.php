<script>
    const ajaxJson = (url, jsonValue, callback) => {
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", url, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // const data = new FormData();
        // for (const key in obj) {
        //     data.append(key, obj[key]);
        // }
        // console.log(data);
        // let value = null;
        // let responseText = (res) => {
        //     value = res;
        // };
        xhttp.send("json=" + jsonValue);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                callback(this.responseText);
            }
        };
        //   return value;
    };
</script>