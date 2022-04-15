</div>
<div class="message-toast">
    <p class="message">
        copied!!
    </p>
</div>
<div class="delete-alert z-index-20 row">
    <div class="col-12">
        <h4 class="m-0 p-0">Do you really want to delete ?</h4>
    </div>
    <div class=" d-flex justify-content-between">
        <a href="" class="btn btn-primary permission rounded-pill px-5 pt-0 fs-4 h-75 ">Yes</a>
        <a href="" class="btn btn-primary permission rounded-pill px-5 pt-0 fs-4 fw-900 h-75">No</a>
    </div>
</div>
<div class="nine-r-popup text-primary">
    <form class="col-11">
        <div class="my-3 col-12">
            <input type="text" class="form-control" placeholder="Source">
        </div>
        <div class="mb-3 col-12">
            <input type="text" class="form-control" placeholder="Destination">
        </div>
        <div class="mb-3 col-12 ">
            <input type="text" class="form-control" placeholder="Quantity">
        </div>
        <div class="row mb-4 mx-0 px-0">
            <div class="col-4 px-0 mt-1 mx-0 text-center">
                <p>Pickup Date</p>
            </div>
            <div class="col-7 px-0 mx-0">
                <input type="date" class="form-control">
            </div>
        </div>
        <div class=" d-flex justify-content-between">
            <a href="" class="btn btn-primary nine-r-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Save</a>
            <a href="" class="btn btn-primary nine-r-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0">Cancel</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('warehouse') }}/js/sidebars.js"></script>

<script src="{{ asset('warehouse') }}/js/index.js">
</script>

<!-- for chart -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const sales = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(sales, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{

                data: [21321, 13444, 32553, 55655, 43587, 65476, 75127],
                backgroundColor: [
                    'red',
                    'blue',
                    'yellow',
                    'green',
                    'purple',
                    'cyan',
                    'orange'
                ],
                borderColor: [
                    'grey',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>

</html>
