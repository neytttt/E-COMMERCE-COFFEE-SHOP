<?php $__env->startSection('title', 'Messages - Grace & Ground'); ?>

<?php $__env->startSection('content'); ?>
<div style="padding: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="margin: 0; color: var(--admin-text-primary);">Messages</h2>
            <p style="margin: 5px 0 0; color: var(--admin-text-secondary);">Customer inquiries</p>
        </div>
        <div>
            <a href="<?php echo e(route('admin.contacts.index', ['unread' => 1])); ?>" style="background: var(--admin-primary); color: var(--admin-bg-primary); padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600;">Unread Only</a>
        </div>
    </div>

    <div style="background: var(--admin-bg-card); border-radius: 10px; border: 1px solid var(--admin-border); overflow: hidden;">
        <table style="width: 100%;">
            <thead>
                <tr style="border-bottom: 1px solid var(--admin-border);">
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Name</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Email</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Message</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Date</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Status</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="border-bottom: 1px solid var(--admin-border);">
                    <td style="padding: 15px 20px; color: var(--admin-text-primary);"><?php echo e($contact->name); ?></td>
                    <td style="padding: 15px 20px; color: var(--admin-text-secondary);"><?php echo e($contact->email); ?></td>
                    <td style="padding: 15px 20px; color: var(--admin-text-secondary); max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo e($contact->message); ?></td>
                    <td style="padding: 15px 20px; color: var(--admin-text-secondary);"><?php echo e($contact->created_at->format('M j, Y')); ?></td>
                    <td style="padding: 15px 20px;">
                        <span style="padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: 600; <?php echo e($contact->is_read ? 'background: var(--admin-success); color: white;' : 'background: var(--admin-warning); color: var(--admin-bg-primary);'); ?>">
                            <?php echo e($contact->is_read ? 'Read' : 'New'); ?>

                        </span>
                    </td>
                    <td style="padding: 15px 20px;">
                        <a href="<?php echo e(route('admin.contacts.show', $contact->id)); ?>" style="color: var(--admin-primary); text-decoration: none; margin-right: 10px;">View</a>
                        <form action="<?php echo e(route('admin.contacts.destroy', $contact->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" style="background: none; border: none; color: var(--admin-error); cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        <?php echo e($contacts->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Sean\OneDrive\Desktop\ground_ecom\ground_ecom\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>