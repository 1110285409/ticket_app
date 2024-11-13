@extends('layouts.app')

<!-- todo relacionado con la primera parte -->

@section('content')
<div class="container mx-auto p-6">
    <header class="text-center py-12 bg-blue-600 text-white">
        <h1 class="text-4xl font-bold">Bienvenido a Softserve</h1>
        <p class="mt-4 text-xl">Soluciones de tickets de servicio para empleados</p>
        <a href="{{ route('actividad.index') }}" class="mt-6 inline-block bg-white text-blue-600 
            font-semibold py-2 px-4 rounded hover:bg-blue-500 hover:text-white transition duration-300">Mis Actividades</a>
        <a href="{{ route('catalogo.index') }}" class="mt-6 inline-block bg-white text-blue-600 
            font-semibold py-2 px-4 rounded hover:bg-blue-500 hover:text-white transition duration-300">Mi Catálogo</a>
    </header>

    <!-- los ultimos ticket -->

    <section class="my-12">
        <!-- Encabezado de la sección -->
        <h2 class="text-3xl font-bold text-center mb-8">Tus Últimos 5 Tickets Creados</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <!-- Encabezados de la tabla -->
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm 
                            font-semibold text-gray-600">Ticket</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm 
                            font-semibold text-gray-600">Descripción</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm 
                            font-semibold text-gray-600">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila 1 -->
                    <tr class="hover:bg-gray-200 transition duration-300">
                        <td class="py-2 px-4 border-b border-gray-200">Ticket #1</td>
                        <td class="py-2 px-4 border-b border-gray-200">Descripción del ticket 1...</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-gray-500">Pendiente</td>
                    </tr>
                    <!-- Fila 2 -->
                    <tr class="hover:bg-gray-200 transition duration-300">
                        <td class="py-2 px-4 border-b border-gray-200">Ticket #2</td>
                        <td class="py-2 px-4 border-b border-gray-200">Descripción del ticket 2...</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-gray-500">Resuelto</td>
                    </tr>
                    <!-- Fila 3 -->
                    <tr class="hover:bg-gray-200 transition duration-300">
                        <td class="py-2 px-4 border-b border-gray-200">Ticket #3</td>
                        <td class="py-2 px-4 border-b border-gray-200">Descripción del ticket 3...</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-gray-500">Pendiente</td>
                    </tr>
                    <!-- Fila 4 -->
                    <tr class="hover:bg-gray-200 transition duration-300">
                        <td class="py-2 px-4 border-b border-gray-200">Ticket #4</td>
                        <td class="py-2 px-4 border-b border-gray-200">Descripción del ticket 4...</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-gray-500">En Proceso</td>
                    </tr>
                    <!-- Fila 5 -->
                    <tr class="hover:bg-gray-200 transition duration-300">
                        <td class="py-2 px-4 border-b border-gray-200">Ticket #5</td>
                        <td class="py-2 px-4 border-b border-gray-200">Descripción del ticket 5...</td>
                        <td class="py-2 px-4 border-b border-gray-200 text-gray-500">Pendiente</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
        

    <!-- Caso de exito -->

    <section class="my-12">
        <h2 class="text-3xl font-bold text-center mb-8">Casos de Éxito</h2>
        <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <h3 class="text-2xl font-semibold mb-4">Empresa XYZ</h3>
            <p>Softserve ayudó a Empresa XYZ a reducir el tiempo de resolución de tickets en un 50%.</p>
            <!-- Gráfica de estado de los tickets -->
            <div class="mt-6">
                <canvas id="ticketChart" style="width: 80%; height: 200px;"></canvas>
            </div>
        </div>
    </section>
    
    <!-- Añadir el script de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        async function fetchTicketData() {
            try {
                const response = await fetch('/api/tickets');
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Error fetching ticket data:', error);
                return { created: 0, pending: 0, resolved: 0, inProcess: 0 };
            }
        }
    
        async function createChart() {
            const ticketData = await fetchTicketData();
            const ctx = document.getElementById('ticketChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Creados', 'Pendientes', 'Resueltos', 'En Proceso'],
                    datasets: [{
                        label: 'Número de Tickets',
                        data: [ticketData.created, ticketData.pending, ticketData.resolved, ticketData.inProcess],
                        backgroundColor: ['#4A90E2', '#F5A623', '#7ED321', '#D0021B'],
                        borderColor: ['#4A90E2', '#F5A623', '#7ED321', '#D0021B'],
                        borderWidth: 1,
                        barThickness: 30  // Ajusta el grosor de las barras
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: '#e0e0e0'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                font: {
                                    size: 14
                                }
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }
    
        // Llamar a la función para crear la gráfica
        createChart();
    </script>

    <!-- Nuestras funcionalidades -->

    <section class="my-12">
        <h2 class="text-3xl font-bold text-center mb-8">Nuestras Funcionalidades</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-transform transform 
                hover:scale-105 duration-300 hover:bg-blue-100">
                <h3 class="text-2xl font-semibold mb-4">Gestión de Tickets</h3>
                <p class="text-lg">Administra y resuelve tickets de manera eficiente.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-transform transform 
                hover:scale-105 duration-300 hover:bg-blue-100">
                <h3 class="text-2xl font-semibold mb-4">Soporte 24/7</h3>
                <p class="text-lg">Estamos aquí para ayudarte en cualquier momento.</p>
            </div>
        </div>
    </section>
         
    
    <!-- Notificaciones -->

    <section class="my-12">
        <h2 class="text-3xl font-bold text-center mb-8">Comentarios de los Tickets</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold 
                            text-gray-600">Ticket</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold 
                            text-gray-600">Estado</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold 
                            text-gray-600">Comentarios</th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold 
                            text-gray-600">Nota Final</th>
                    </tr>
                </thead>
                <tbody id="ticketTableBody">
                    <!-- Aquí se insertarán los tickets dinámicamente -->
                </tbody>
            </table>
        </div>
        <div class="flex justify-center items-center mt-8">
            <button id="prevPage" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-4 hover:bg-blue-700 
                transition duration-300">Anterior</button>
            <span id="pageInfo" class="text-lg mx-4">Página 1 de 10</span>
            <button id="nextPage" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 
                transition duration-300">Siguiente</button>
        </div>
    </section>
    
    <!-- Añadir el script de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let currentPage = 1;
        const ticketsPerPage = 5;
        let totalPages = 10; // Este valor debería ser dinámico basado en el total de tickets
    
        async function fetchTickets(page) {
            try {
                const response = await fetch(`/api/tickets?page=${page}&limit=${ticketsPerPage}`);
                const data = await response.json();
                totalPages = Math.ceil(data.total / ticketsPerPage); // Actualizar el total de páginas basado en la respuesta
                return data.tickets;
            } catch (error) {
                console.error('Error fetching ticket data:', error);
                return [];
            }
        }
    
        function renderTickets(tickets) {
            const ticketTableBody = document.getElementById('ticketTableBody');
            ticketTableBody.innerHTML = ''; // Limpiar la tabla actual
    
            tickets.forEach(ticket => {
                const ticketRow = document.createElement('tr');
                ticketRow.className = 'hover:bg-gray-50 transition duration-300';
                ticketRow.innerHTML = `
                    <td class="py-2 px-4 border-b border-gray-200">Ticket #${ticket.id}</td>
                    <td class="py-2 px-4 border-b border-gray-200">${ticket.status}</td>
                    <td class="py-2 px-4 border-b border-gray-200">${ticket.comments}</td>
                    <td class="py-2 px-4 border-b border-gray-200">${ticket.finalNote}</td>
                `;
                ticketTableBody.appendChild(ticketRow);
            });
    
            document.getElementById('pageInfo').textContent = `Página ${currentPage} de ${totalPages}`;
        }
    
        async function loadTickets(page) {
            const tickets = await fetchTickets(page);
            renderTickets(tickets);
        }
    
        document.getElementById('prevPage').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                loadTickets(currentPage);
            }
        });
    
        document.getElementById('nextPage').addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                loadTickets(currentPage);
            }
        });
    
        // Cargar la primera página de tickets al inicio
        loadTickets(currentPage);
    </script>
    

    
    <!-- Redes sociales -->

    <section class="my-12 text-center">
        <h2 class="text-3xl font-bold text-center mb-8">Síguenos en Redes Sociales</h2>
        <a href="https://www.facebook.com/tu-pagina" target="_blank" class="inline-block mx-2 text-blue-600 
            hover:text-blue-800 transition duration-300 active:text-blue-900">
            <i class="fab fa-facebook fa-2x"></i>
        </a>
        <a href="https://www.twitter.com/tu-pagina" target="_blank" class="inline-block mx-2 text-blue-600 
            hover:text-blue-800 transition duration-300 active:text-blue-900">
            <i class="fab fa-twitter fa-2x"></i>
        </a>
        <a href="https://www.linkedin.com/tu-pagina" target="_blank" class="inline-block mx-2 text-blue-600 
            hover:text-blue-800 transition duration-300 active:text-blue-900">
            <i class="fab fa-linkedin fa-2x"></i>
        </a>
    </section>
    
    <!-- Añadir el script de Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    

 <!-- terminos y condiciones -->

    <section class="my-12">
        <h2 class="text-3xl font-bold text-center mb-8">Términos y Condiciones</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-file-contract fa-2x text-blue-600 mr-4"></i>
                    <h3 class="text-2xl font-semibold">Términos de Uso</h3>
                </div>
                <p>Al utilizar nuestro sitio web, aceptas cumplir con nuestros términos y condiciones. Estos términos incluyen, pero no se limitan a, el uso adecuado de nuestros servicios, la protección de la información personal y el cumplimiento de todas las leyes aplicables.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-shield-alt fa-2x text-blue-600 mr-4"></i>
                    <h3 class="text-2xl font-semibold">Políticas de Seguridad</h3>
                </div>
                <p>Nos comprometemos a proteger la información personal de nuestros usuarios. Implementamos medidas de seguridad avanzadas para garantizar que tus datos estén seguros y protegidos contra accesos no autorizados.</p>
            </div>
        </div>
    </section>
</div>
@endsection
