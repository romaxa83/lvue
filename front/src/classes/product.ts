export class Product{
    id: number;
    title: string;
    description: string;
    price: number;

    constructor(json: any = null) {
        this.id = json?.id;
        this.title = json?.title;
        this.description = json?.description;
        this.price = json?.price;
    }
}