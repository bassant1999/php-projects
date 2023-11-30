// store.js
const { createApp, reactive} = Vue

const store = reactive({
    status:0,
    type:null,
    user_id:null,
    type: null
  })

fetch('php/global.php')
.then(res => res.json())
.then(res =>
{
    if(res[0].status === 1)
    {
        store.status = 1;
        store.type = res[0].type;
        store.user_id= res[0].user_id;
    }
    else
    {
        store.status = 0;
    }
    // console.log("s", status.value);
    // console.log("t", type.value);
})

export {store}