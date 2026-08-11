import { Component, OnInit, inject } from '@angular/core';
import { Contact, ContactService } from '../services/contact.service';
import { ContactModalComponent } from '../contact-modal/contact-modal.component';

@Component({
  selector: 'app-newsletter',
  standalone: true,
  imports: [ContactModalComponent],
  templateUrl: './newsletter.component.html',
  styleUrl: './newsletter.component.css'
})
export class NewsletterComponent implements OnInit {

  private contactService = inject(ContactService);

  contacts: Contact[] = [];

  isModalOpen = false;

  ngOnInit(): void {
    this.loadContacts();
  }

  loadContacts(): void {
    this.contactService.getContacts().subscribe({
      next: (response: any) => {
        console.log('Resposta da API:', response);

        // Se sua API retorna { success: true, data: [...] }
        this.contacts = response.data ?? response;
      },
      error: (error) => {
        console.error('Erro ao buscar inscritos:', error);
      }
    });
  }



  openModal(): void {
    console.log('ABRIU MODAL');
    this.isModalOpen = true;
  }

  closeModal(): void {
    this.isModalOpen = false;
  }
}
