
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Set the default view to month
            views: {
                timeGridWeek: { // Configure the week view
                    type: 'timeGridWeek',
                    duration: { days: 8 }, // Show a week at a time
                },
                timeGridDay: { // Configure the day view
                    type: 'timeGridDay',
                },
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                <?php foreach ($profit as $item): ?>
                {
                    title: ' $ <?php echo number_format($item['amount'], 2); ?>',
                    start: '<?php echo $item['created_at']; ?>',
                    end: '<?php echo $item['created_at']; ?>',
                },
                <?php endforeach; ?>
            ],
            eventClick: function(info) {
                // Handle event click (show details, etc.)
                alert('Event: ' + info.event.title);
            },
        });
        calendar.render();
    });
</script>
<style>
    .fc-event-time {
        display: none;
    }
</style>
<?php $__env->startSection('content'); ?>

    <div class="dashboard-body-part">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 fw-medium"><?php echo e(__('Daily Earning')); ?></h5>
                    </div>
                    <div class="card-body">
                            <div class="col-md-12 text-center mt-5">
                                <div id="calendar"></div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make(Config::theme() . 'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\forexxx\main\resources\views/frontend/default/user/gateway/earning.blade.php ENDPATH**/ ?>