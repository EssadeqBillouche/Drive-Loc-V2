let allDataFetched = [];

fetch("classes/data.php")
    .then(respon => respon.json())
    .then(data => {
        allDataFetched = data;
        console.log('Fetched Data:', allDataFetched);
    })
    .catch(error => console.error('Error fetching data:', error));

function displayAllData(id) {
    const container = document.querySelector("#containerCar");
    container.innerHTML = '';
    if (allDataFetched.length === 0) {
        container.innerHTML = 'No data available';
        return;
    }

    if (id === 'all') {
        // Display all cars
        allDataFetched.forEach(car => {
            container.innerHTML += `
            <div class="Card_Card_ col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="${car.car_image}" alt="${car.name}">
                    <h4 class="text-uppercase mb-4">${car.car_brand}</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>${car.model}</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>${car.GearBox}</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>${car.mileage}</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="detail.php?id=${car.car_id}">$ ${car.car_price_per_day}</a>
                </div>
            </div>`;
        });
    } else {
        allDataFetched.forEach(car => {
            if (car.car_category == id) {
                console.log(car.car_category)
                container.innerHTML += `
            <div class="Card_Card_ col-lg-4 col-md-6 mb-2">
                <div class="rent-item mb-4">
                    <img class="img-fluid mb-4" src="${car.car_image}" alt="${car.name}">
                    <h4 class="text-uppercase mb-4">${car.car_brand}</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span>${car.model}</span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span>${car.GearBox}</span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span>${car.mileage}</span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="Booking.php?id=${car.car_id}">$ ${car.car_price_per_day}</a>
                </div>
            </div>`;
            }
        });
    }
}
const selectedCategory = document.getElementById('SelectedCategory');

selectedCategory.addEventListener('change', () => {
    const categoryId = selectedCategory.value;
    console.log('Selected ', categoryId);
    displayAllData(categoryId);
});
