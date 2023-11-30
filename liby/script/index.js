
const { createApp, ref } = Vue
import { Book } from "./services/book";

const app = createApp({
    setup() {
    const message = ref('Hello index!');
    const status = ref(0);
    const type = ref(0);
    const user_id = ref(0);
    const books = ref([]);
    const sbook_title = ref("");

    fetch('php/global.php')
    .then(res => res.json())
    .then(res =>
    {
        if(res[0].status === 1)
        {
            status.value = 1;
            type.value = res[0].type;
            user_id.value = res[0].user_id;
        }
        else
        {
            status.value = 0;
        }
        console.log("s", status.value);
        console.log("t", type.value);
    })

    // get all books
    fetch('php/books.php')
    .then(res => res.json())
    .then(res =>
    {
        console.log(res);
        res.forEach(get_book);

        function get_book(value) {
            console.log(value["row"].title);
            books.value.push(value["row"]);
        }
    })

    // borrow
    const borrow = (event) =>
    {
        var book_id = event.target.getAttribute("data-id");
        console.log(book_id);
        let result = Book.borrow(book_id, user_id.value);
        // fetch('php/borrow.php?bookId='+ book_id +'&userId=' + user_id.value)
        // .then(res => res.json())
        // .then(res =>
        // {
        //     console.log(res);
            
        // })
    }
    
    const search = () =>
    {
        window.location.href = "search.html";
    }

    return {
    message, status, type, books, sbook_title, borrow, search
    }


    }
  })

app.mount('#index')
