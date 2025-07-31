import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product Details',
        href: '/backend/products/show',
    },
];

interface Product {
    id: number;
    name: string;
    price: number;
    description?: string;
}

export default function Show() {
    const { product } = usePage().props as { product: Product };
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`Product: ${product.name}`} />
            <div className="m-4">
                <Link
                    href={route('backend.products.index')}
                    className="inline-flex items-center justify-center rounded-md bg-primary text-sm font-medium text-white hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 focus:outline-none"
                >
                    <Button>Back</Button>
                </Link>
            </div>
            <div className="flex min-h-[60vh] items-center justify-center">
                <div className="w-full max-w-5xl rounded-xl border border-gray-200 bg-white p-8 shadow-lg dark:border-gray-700 dark:bg-gray-900">
                    <h2 className="mb-6 text-2xl font-bold text-gray-800 dark:text-gray-100">Product Details</h2>
                    <div className="mb-4">
                        <span className="block text-xs font-semibold text-gray-500 dark:text-gray-400">Name</span>
                        <span className="text-lg font-medium text-gray-900 dark:text-gray-100">{product.name}</span>
                    </div>
                    <div className="mb-4">
                        <span className="block text-xs font-semibold text-gray-500 dark:text-gray-400">Price</span>
                        <span className="text-lg font-medium text-gray-900 dark:text-gray-100">₹{product.price}</span>
                    </div>
                    <div>
                        <span className="block text-xs font-semibold text-gray-500 dark:text-gray-400">Description</span>
                        <span className="text-base text-gray-800 dark:text-gray-200">{product.description || 'No description.'}</span>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
