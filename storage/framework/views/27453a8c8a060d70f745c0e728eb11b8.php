

<?php $__env->startSection('title', 'Order Confirmation - Geraimu Coffee Shop'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gray-50 min-h-screen pt-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <!-- Success Message -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Thank You for Your Order!</h1>
                <p class="text-gray-600">Order #<?php echo e($order->id); ?> has been successfully placed</p>
            </div>

            <!-- Customer Details -->
            <div class="border-t border-gray-100 pt-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Customer Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-medium"><?php echo e($order->name); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-medium"><?php echo e($order->email); ?></p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-sm text-gray-600">Delivery Address</p>
                        <p class="font-medium"><?php echo e($order->address); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Province</p>
                        <p class="font-medium"><?php echo e($order->province); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">City</p>
                        <p class="font-medium"><?php echo e($order->city); ?></p>
                    </div>
                </div>
            </div>

            <!-- Shipping Details -->
            <div class="border-t border-gray-100 pt-8 mt-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Shipping Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Courier</p>
                        <p class="font-medium uppercase"><?php echo e($order->shipping_courier); ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Service</p>
                        <p class="font-medium"><?php echo e($order->shipping_service); ?></p>
                    </div>
                </div>
            </div>

            <!-- Order Details -->
            <div class="border-t border-gray-100 pt-8 mt-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Order Details</h2>
                <div class="space-y-4">
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex justify-between items-center py-3 border-b border-gray-100">
                            <div>
                                <h3 class="font-medium text-gray-900"><?php echo e($item->product->name); ?></h3>
                                <p class="text-sm text-gray-500">Quantity: <?php echo e($item->quantity); ?></p>
                            </div>
                            <span class="font-medium text-gray-900">$<?php echo e(number_format($item->price * $item->quantity, 2)); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="pt-4">
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium text-gray-900">$<?php echo e(number_format($order->subtotal, 2)); ?></span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Tax (12%)</span>
                            <span class="font-medium text-gray-900">$<?php echo e(number_format($order->tax, 2)); ?></span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Delivery Fee</span>
                            <span class="font-medium text-gray-900">$<?php echo e(number_format($order->shipping_cost, 2)); ?></span>
                        </div>

                        <div class="flex justify-between items-center py-2 text-lg font-semibold border-t border-gray-100 mt-2">
                            <span>Total</span>
                            <span class="text-primary-600">$<?php echo e(number_format($order->total, 2)); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="mt-8 space-y-4">
                <p class="text-gray-600">We've sent a confirmation email to your inbox with all the details of your order.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo e(route('welcome')); ?>" 
                       class="inline-flex justify-center items-center px-6 py-3 border border-primary-600 text-primary-600 hover:bg-primary-50 rounded-lg transition-colors duration-200 font-medium">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PFS-Praktikum\toko-online\resources\views/orders/confirmation.blade.php ENDPATH**/ ?>