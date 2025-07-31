import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Button } from '@/components/ui/button';
import { Table, TableBody, TableCaption, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { Megaphone } from 'lucide-react';
import { useEffect, useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Products',
        href: '/backend/products',
    },
];

interface PageProps {
    flash: {
        success?: string;
        error?: string;
    };
}

interface Product {
    id: number;
    name: string;
    price: number;
}

export default function Index() {
    const flashFromPage = (usePage().props as Partial<PageProps>).flash || {};
    const [flash, setFlash] = useState(flashFromPage);
    const { products = [] } = usePage().props as { products: Product[] };
    const { processing, delete: destroy } = useForm();

    useEffect(() => {
        setFlash(flashFromPage);
        if (flashFromPage.success || flashFromPage.error) {
            const timer = setTimeout(() => {
                setFlash({});
            }, 2000);
            return () => clearTimeout(timer);
        }
    }, [flashFromPage.success, flashFromPage.error]);

    const handleDelete = (id: number, name: string) => {
        if (confirm(`Do you want to delete a product - ${id}. ${name}`)) {
            destroy(route('backend.products.destroy', id));
        }
    };

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
            <div className="m-4">
                {(flash.success || flash.error) && (
                    <Alert className="mb-4">
                        <Megaphone className="h-4 w-4" />
                        <AlertTitle>Notification!</AlertTitle>
                        <AlertDescription>{flash.success || flash.error}</AlertDescription>
                    </Alert>
                )}
            </div>
            {products.length > 0 && (
                <div className="m-4 overflow-x-auto rounded-xl border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-900">
                    <Table className="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <TableCaption className="px-4 py-2 text-left text-gray-500 dark:text-gray-400">A list of your recent products.</TableCaption>
                        <TableHeader>
                            <TableRow className="bg-gray-50 dark:bg-gray-800">
                                <TableHead className="w-[100px] px-4 py-3 text-left text-xs font-semibold tracking-wider text-gray-700 uppercase dark:text-gray-200">
                                    ID
                                </TableHead>
                                <TableHead className="px-4 py-3 text-left text-xs font-semibold tracking-wider text-gray-700 uppercase dark:text-gray-200">
                                    Name
                                </TableHead>
                                <TableHead className="px-4 py-3 text-left text-xs font-semibold tracking-wider text-gray-700 uppercase dark:text-gray-200">
                                    Price
                                </TableHead>
                                <TableHead className="px-4 py-3 text-center text-xs font-semibold tracking-wider text-gray-700 uppercase dark:text-gray-200">
                                    Action
                                </TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {products.map((product) => (
                                <TableRow key={product.id} className="transition-colors hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <TableCell className="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">{product.id}</TableCell>
                                    <TableCell className="px-4 py-3 text-gray-700 dark:text-gray-200">{product.name}</TableCell>
                                    <TableCell className="px-4 py-3 text-gray-700 dark:text-gray-200">{product.price}</TableCell>
                                    <TableCell className="space-x-2 px-4 py-3 text-center">
                                        <Link href={route('backend.products.show', product.id)}>
                                            <Button className="bg-blue-500 hover:bg-blue-600">View</Button>
                                        </Link>
                                        <Link href={route('backend.products.edit', product.id)}>
                                            <Button className="bg-slate-600 hover:bg-slate-700">Edit</Button>
                                        </Link>
                                        <Button
                                            disabled={processing}
                                            onClick={() => handleDelete(product.id, product.name)}
                                            className="bg-red-500 hover:bg-red-700"
                                        >
                                            Delete
                                        </Button>
                                    </TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                    </Table>
                </div>
            )}
        </AppLayout>
    );
}
