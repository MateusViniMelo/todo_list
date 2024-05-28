export interface IUserForm {
    name: string;
    avatar?: File | null;
    email: string;
    password: string | null;
    password_confirmation: string | null
}