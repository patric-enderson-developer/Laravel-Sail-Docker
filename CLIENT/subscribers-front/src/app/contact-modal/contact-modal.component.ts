import {
  Component,
  EventEmitter,
  Input,
  Output,
  inject
} from '@angular/core';

import {
  FormBuilder,
  ReactiveFormsModule,
  Validators
} from '@angular/forms';

import {
  Contact,
  ContactService
} from '../services/contact.service';

@Component({
  selector: 'app-contact-modal',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './contact-modal.component.html',
  styleUrl: './contact-modal.component.css'
})
export class ContactModalComponent {

  @Input() isOpen = false;

  @Output() close = new EventEmitter<void>();

  private fb = inject(FormBuilder);

  private contactService = inject(ContactService);

  isLoading = false;

  submitError = '';

  submitSuccess = false;


  contactForm = this.fb.group({

    name: [
      '',
      Validators.required
    ],

    email: [
      '',
      [
        Validators.required,
        Validators.email
      ]
    ],

    phone: [''],

    company: [''],

    position: ['']

  });


  closeModal(): void {

    this.close.emit();

  }


  formatPhone(event: Event): void {

    const input =
      event.target as HTMLInputElement;

    let value =
      input.value.replace(/\D/g, '');

    if (value.length > 11) {

      value =
        value.substring(0, 11);

    }

    if (value.length <= 10) {

      value = value.replace(
        /^(\d{2})(\d{4})(\d{0,4})$/,
        '($1) $2-$3'
      );

    } else {

      value = value.replace(
        /^(\d{2})(\d{5})(\d{0,4})$/,
        '($1) $2-$3'
      );

    }

    this.contactForm.controls.phone.setValue(
      value,
      {
        emitEvent: false
      }
    );

  }


  submit(): void {

    if (this.contactForm.invalid) {

      this.contactForm.markAllAsTouched();

      return;

    }

    this.isLoading = true;

    this.submitError = '';

    this.submitSuccess = false;


    const formData = {

      name:
        this.contactForm.value.name ?? '',

      email:
        this.contactForm.value.email ?? '',

      phone:
        this.contactForm.value.phone || null,

      company:
        this.contactForm.value.company || null,

      position:
        this.contactForm.value.position || null

    };


    this.contactService
      .createContact(formData)
      .subscribe({

        next: (contact) => {

          console.log(
            'Inscrito salvo:',
            contact
          );

          this.isLoading = false;

          this.submitSuccess = true;

          this.contactForm.reset();

        },

        error: (error) => {

          console.error(
            'Erro ao salvar:',
            error
          );

          this.isLoading = false;

          if (error.error?.message) {

            this.submitError =
              error.error.message;

          } else if (error.error?.errors) {

            const firstKey =
              Object.keys(
                error.error.errors
              )[0];

            this.submitError =
              error.error.errors[firstKey][0];

          } else {

            this.submitError =
              'Erro ao salvar. Tente novamente.';

          }

        }

      });

  }

}
