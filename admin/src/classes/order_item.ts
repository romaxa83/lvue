import {Entity} from "@/interfaces/entity";

export class OrderItem implements Entity{
    id: number;
    product_title: string;
    price: number;
    quantity: number;

    constructor(
        id = 0,
        title = '',
        quantity = 0,
        price = 0,
    ) {
        this.id = id;
        this.product_title = title;
        this.price = price;
        this.quantity = quantity;
    }
}