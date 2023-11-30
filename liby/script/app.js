
const { createApp, ref } = Vue

const app = createApp({
    setup() {

      const status = ref(0);
      const user_name = ref("");
      const password = ref("");
      
      const login = () =>
      {
        console.log("login");
        console.log(user_name);
        console.log(password);
        fetch('php/validation.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            username: user_name.value,
            password: password.value
        })
        })
        .then(res => res.json())
        .then(res => 
        {
            console.log(res[0].status);
            if(res[0].status == 1)
            {
              status.value = 1;
              window.location.href = "index.html";
            }
            else
            {
              status.value = 2;
            }
        });

      }


      return {
         status, user_name, password, login
      }


    }
  })

app.mount('#app')
