import { Component, EventEmitter, Input, Output, inject } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';

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

  contactForm = this.fb.group({
    name: ['', Validators.required],
    email: ['', [
      Validators.required,
      Validators.email,
      // Regex mais rigorosa para validar e-mails reais
      Validators.pattern('^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,4}$')
    ]],
    phone: ['', [
      // Valida se a máscara foi preenchida corretamente (ex: (41) 99999-9999)
      // Se o telefone não for obrigatório, ele aceita vazio. Se for, adicione Validators.required
      Validators.pattern('^\\(\\d{2}\\)\\s\\d{4,5}-\\d{4}$')
    ]],
    company: [''],
    position: ['']
  });

  closeModal(): void {
    this.close.emit();
  }

  formatPhone(event: Event): void {
    const input = event.target as HTMLInputElement;

    // O \D remove TUDO que não for dígito (letras, espaços, símbolos)
    let value = input.value.replace(/\D/g, '');

    if (value.length > 11) {
      value = value.substring(0, 11);
    }

    if (value.length <= 10) {
      value = value.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
    } else {
      value = value.replace(/^(\d{2})(\d{5})(\d{0,4})$/, '($1) $2-$3');
    }

    this.contactForm.controls.phone.setValue(value, { emitEvent: false });
  }

  submit(): void {
    if (this.contactForm.invalid) {
      this.contactForm.markAllAsTouched();
      return;
    }

    console.log(this.contactForm.value);
  }
}
