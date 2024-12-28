<?php
//namespace App\Enums;
//
//
//
//enum StatusEnum:string {
//
//case Pending = 'pending';
//
//case Active = 'active';
//
//case Inactive = 'inactive';
//
//case Rejected = 'rejected';
//
//
//
//    public function label()
//    {
//        return match($this){
//        StatusEnum::Pending => 'pending',
//StatusEnum::Active => 'active',
//};
//        }
//
//
//
////    public function description(): string
////    {
////        return match ($this) {
////        self::Admin => 'Administrator with full access',
////            self::Editor => 'Editor with limited access',
////            self::Viewer => 'Viewer with read-only access',
////        };
////    }
//
//}


namespace App\Enums;

enum StatusEnum: string
{
case
    Pending = 'pending';
case
    Active = 'active';
case
    Inactive = 'inactive';
case
    Rejected = 'rejected';

    // Define a method to get a label for each enum case
    public
    function label(): string
    {
        return match($this){
        self::Pending => 'Pending Approval',
            self::Active => 'Active Status',
            self::Inactive => 'Inactive Status',
            self::Rejected => 'Rejected Request',
        };
    }
}
