import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: '/backend/products',
    },
];

export default function Index() {
    return (
        // Using app-layout ::
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Product" />
            <div className="m-4">
                <Link
                    href={route('backend.products.create')}
                    className="inline-flex items-center justify-center rounded-md bg-primary px-1 py-1 text-sm font-medium text-white hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 focus:outline-none"
                >
                    <Button>Create</Button>
                </Link>
            </div>
        </AppLayout>
    );
}
