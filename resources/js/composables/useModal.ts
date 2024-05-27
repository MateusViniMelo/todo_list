import { Modal } from "flowbite";
import type { ModalInterface } from "flowbite";

export function useModal() {
    function openModal(modalId: string) {
        const $modalElement: HTMLElement | null = document.querySelector(
            `#${modalId}`
        );

        const modal: ModalInterface = new Modal($modalElement);

        modal.show();
    }

    function closeModal(modalId: string) {
        const $modalElement: HTMLElement | null = document.querySelector(
            `#${modalId}`
        );

        const modal: ModalInterface = new Modal($modalElement);

        modal.hide();
    }

    return { closeModal, openModal };
}
