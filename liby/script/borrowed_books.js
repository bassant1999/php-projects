// import { createApp, ref} from "vue";
// import  {store} from "store.js";

const { createApp, ref } = Vue;
import  {store} from "./store.js";


const app = createApp({
    setup() {
        // const m = ref('message');
    const status = ref(0);
    const type = ref(0);
    const user_id = ref(0);
    const sbook_title = ref("");
    const books = ref([]);

    console.log('status', store.status);

    // fetch('php/global.php')
    // .then(res => res.json())
    // .then(res =>
    // {
    //     if(res[0].status === 1)
    //     {
    //         status.value = 1;
    //         type.value = res[0].type;
    //         user_id.value = res[0].user_id;
    //     }
    //     else
    //     {
    //         status.value = 0;
    //     }
    //     console.log("s", status.value);
    //     console.log("t", type.value);
    // })

    // borrow
    const borrow = (event) =>
    {
        var book_id = event.target.getAttribute("data-id");
        console.log(book_id);
        // result = Book.borrow(book_id, user_id.value);
        fetch('php/borrow.php?bookId='+ book_id +'&userId=' + user_id.value)
        .then(res => res.json())
        .then(res =>
        {
            console.log(res);
            
        })
    }
    
    const search = () =>
    {
        window.location.href = "search.html";
    }

    const get_userId = () =>
    {
        fetch('php/global.php')
        .then(res => res.json())
        .then(res =>
        {
            if(res[0].status === 1)
            {
                status.value = 1;
                type.value = res[0].type;
                user_id.value = res[0].user_id;
                console.log("id",res[0].user_id);
                return res[0].user_id;
            }
            else
            {
                status.value = 0;
            }
            return user_id.value;
        })
    }

    console.log("user_id", get_userId())

    //get borrowed books
    window.onload = () =>
    {
        fetch('php/borrowed_books.php?userId=' + get_userId())
    .then(res => res.json())
    .then(res =>
    {
        console.log("books", res, 'php/borrowed_books.php?userId=' + get_userId());
        res.forEach(get_book);

        function get_book(value) {
            console.log(value["row"].title);
            books.value.push(value["row"]);
        }
    })
    }
    

    return {
      status, type, sbook_title, books, borrow, search
    }


    }
  })

app.mount('#borrowed_books')
