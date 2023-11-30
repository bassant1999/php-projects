
const Book = {
    borrow (book_id, user_id)
    {
        
        fetch('php/borrow.php?bookId='+ book_id +'&userId=' + user_id)
        .then(res => res.json())
        .then(res =>
        {
            console.log(res);
            
        })
    },

    search()
    {
        window.location.href = "search.html";
    }

}

export {Book}
