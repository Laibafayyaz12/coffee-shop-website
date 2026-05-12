

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-coffee text-white">
            <h3 class="mb-0"><i class="fas fa-envelope"></i> Contact Messages</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="contacts-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Reply Modal -->
<div class="modal fade" id="replyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-coffee text-white">
                <h5 class="modal-title">Reply to Message</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Original Message:</label>
                    <p id="original-message" class="border p-2 rounded bg-light"></p>
                </div>
                <div class="mb-3">
                    <label for="reply">Your Reply:</label>
                    <textarea id="reply" class="form-control" rows="4" placeholder="Type your reply here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-coffee" id="sendReply">Send Reply</button>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: #2c1810 !important;
    }
    .btn-coffee {
        background: #6f4e37;
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
let currentContactId = null;

$(function() {
    $('#contacts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(route("admin.contacts.data")); ?>',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user.name', name: 'user.name' },
            { data: 'subject', name: 'subject' },
            { data: 'message', name: 'message' },
            { data: 'is_replied', name: 'is_replied' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
    
    $(document).on('click', '.reply-contact', function() {
        currentContactId = $(this).data('id');
        let message = $(this).data('message');
        $('#original-message').text(message);
        $('#reply').val('');
        $('#replyModal').modal('show');
    });
    
    $('#sendReply').click(function() {
        let reply = $('#reply').val();
        if(reply.trim() === '') {
            alert('Please enter a reply');
            return;
        }
        
        $.ajax({
            url: '<?php echo e(route("admin.reply-contact")); ?>',
            method: 'POST',
            data: {
                contact_id: currentContactId,
                reply: reply,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.success) {
                    alert('Reply sent successfully!');
                    $('#replyModal').modal('hide');
                    $('#contacts-table').DataTable().ajax.reload();
                }
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/admin/contacts.blade.php ENDPATH**/ ?>