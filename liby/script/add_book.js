
const { createApp, ref } = Vue

const app = createApp({
    setup() {
    const title = ref('');
    const author = ref('');
    const description = ref('');
    const img_url = ref('');
    const status = ref(0);
    const user_id = ref(0);
    const success_msg = ref(0);

    // get status of loging in and user id
    fetch('php/global.php')
    .then(res => res.json())
    .then(res =>
    {
        if(res[0].status)
        {
            status.value = 1;
            user_id.value = res[0].user_id;
        }
        else
        {
            status.value = 0;
        }
        console.log(status.value);
        console.log(user_id.value);
    })

    // add book
    const add_book = () =>
    {
        if(title.value && author.value && description.value && img_url.value)
        {
            console.log("ok");
            fetch('php/add_book.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                title: title.value,
                author: author.value,
                description: description.value,
                img_url: img_url.value,
                added_by: user_id.value
            })
            })
            .then(res => res.json())
            .then(res => 
            {
                console.log(res[0].status);
                if(res[0].status == 1)
                {
                    success_msg.value = 1;
                    title.value = '';
                    author.value = '';
                    description.value = '';
                    img_url.value = '';
                }
                else
                {
                    success_msg.value = 0;
                }
                
            });
        }
        else
        {
            success_msg.value = 2;
        }
        // console.log("no");
    }

    
    return {
        success_msg, title, author, description, img_url, status, add_book
    }

    }
  })

app.mount('#add_book')
