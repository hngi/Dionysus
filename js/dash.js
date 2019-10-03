var ctx = document.getElementById('myChart').getContext('2d');
                    var myBarChart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',

                        // The data for our dataset
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [{
                                label: 'Amount in ₦',
                                backgroundColor: '#1aa093',
                                borderColor: '#1aa093',
                                data: [50000, 45000, 40000, 35000, 30000, 25000, 20000, 15000, 10000, 5000]
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });
                    var ctx = document.getElementById('myChart1').getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'doughnut',

                        // The data for our dataset
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [{
                                label: 'Amount in ₦',
                                backgroundColor: '#1aa093',
                                borderColor: '#1aa093',
                                data: [50000, 45000, 40000, 35000, 30000, 25000, 20000, 15000, 10000, 5000],
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });