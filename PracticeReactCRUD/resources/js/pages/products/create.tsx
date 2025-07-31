import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, useForm } from '@inertiajs/react';
import { CircleAlert } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create New Product',
        href: '/backend/products/create',
    },
];

export default function Create() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        price: '',
        description: '',
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('backend.products.store'), {
            onSuccess: () => {
                setData({ name: '', price: '', description: '' }); // Reset form after successful submission
            },
        });
    };

    return (
        // Using app-layout ::
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Create Product" />
            <div className="m-4">
                <Link
                    href={route('backend.products.index')}
                    className="inline-flex items-center justify-center rounded-md bg-primary text-sm font-medium text-white hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 focus:outline-none"
                >
                    <Button>Back</Button>
                </Link>
            </div>
            {Object.keys(errors).length > 0 && (
                <div className="flex justify-center">
                    <Alert variant="destructive" className="mb-6 flex w-full max-w-5xl items-start gap-3">
                        <CircleAlert className="mt-1 h-5 w-5 text-red-600 dark:text-red-400" />
                        <div>
                            <AlertTitle>There were some errors with your submission:</AlertTitle>
                            <AlertDescription>
                                <ul className="list-inside list-disc">
                                    {Object.values(errors).map((err, i) => (
                                        <li key={i}>{err}</li>
                                    ))}
                                </ul>
                            </AlertDescription>
                        </div>
                    </Alert>
                </div>
            )}
            <div className="flex min-h-[60vh] items-center justify-center">
                <form
                    onSubmit={handleSubmit}
                    className="w-full max-w-5xl space-y-6 rounded-xl border border-gray-200 bg-white p-8 shadow-lg dark:border-gray-700 dark:bg-gray-900"
                    action=""
                >
                    <div className="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <Label htmlFor="name" className="mb-1 block font-semibold text-gray-700 dark:text-gray-200">
                                Product Name
                            </Label>
                            <Input
                                value={data.name}
                                onChange={(e) => setData('name', e.target.value)}
                                id="name"
                                name="name"
                                type="text"
                                className="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 focus:ring-2 focus:ring-primary/50 focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                            />
                            {errors.name && <p className="mt-1 text-sm text-red-600 dark:text-red-400">{errors.name}</p>}
                        </div>
                        <div>
                            <Label htmlFor="price" className="mb-1 block font-semibold text-gray-700 dark:text-gray-200">
                                Price
                            </Label>
                            <Input
                                value={data.price}
                                onChange={(e) => setData('price', e.target.value)}
                                id="price"
                                name="price"
                                type="number"
                                step="0.01"
                                className="w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 focus:ring-2 focus:ring-primary/50 focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                            />
                            {errors.price && <p className="mt-1 text-sm text-red-600 dark:text-red-400">{errors.price}</p>}
                        </div>
                    </div>
                    <div>
                        <Label htmlFor="description" className="mb-1 block font-semibold text-gray-700 dark:text-gray-200">
                            Description
                        </Label>
                        <Textarea
                            value={data.description}
                            onChange={(e) => setData('description', e.target.value)}
                            id="description"
                            name="description"
                            placeholder="Type your message here."
                            className="min-h-[100px] w-full rounded-md border border-gray-300 bg-gray-50 px-3 py-2 text-gray-900 focus:ring-2 focus:ring-primary/50 focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                        />
                        {errors.description && <p className="mt-1 text-sm text-red-600 dark:text-red-400">{errors.description}</p>}
                    </div>
                    <div className="flex justify-end pt-2">
                        <Button
                            type="submit"
                            className="rounded-md bg-primary px-6 py-2 font-semibold text-white hover:bg-primary/90 focus:ring-2 focus:ring-primary/50 focus:outline-none"
                        >
                            Add Product
                        </Button>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
