const totalCount = document.getElementById("count");
const totalPrice = document.getElementById("price");
totalCount.value = count;

const handleIncrement = () => {
    count++;
    totalCount.value = count;
};

const handleDecrement = () => {
    if (count > 0){
        count--;
        totalCount.value = count;
    }
    else {
        count = 0;
        totalCount.value = count;
    }
};

const incrementCount = document.getElementById("increment");
const decrementCount = document.getElementById("decrement");

incrementCount.addEventListener("click", handleIncrement);
decrementCount.addEventListener("click", handleDecrement);