import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create New Product',
        href: '/backend/products/create',
    },
];

export default function Create() {
    return (
        // Using app-layout ::
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Create Product" />
            <div className="m-4">
                <Link
                    href={route('backend.products.index')}
                    className="inline-flex items-center justify-center rounded-md bg-primary px-1 py-1 text-sm font-medium text-white hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 focus:outline-none"
                >
                    <Button>Back</Button>
                </Link>
            </div>
            <div className="m-4">
                <form action="">
                    <div>
                        <Label htmlFor="name">Product Name</Label>
                        <Input id="name" name="name" type="text" />
                    </div>
                    <div>
                        <Label htmlFor="price">Price</Label>
                        <Input id="price" name="price" type="number" step="0.01" />
                    </div>
                    <div>
                        <Label htmlFor="description">Description</Label>
                        <Input id="description" name="description" type="text" />
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
